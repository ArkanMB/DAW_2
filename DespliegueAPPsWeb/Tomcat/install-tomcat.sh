#!/bin/bash

# Actualizamos Ubuntu 20.04
sudo apt update && sudo apt upgrade -y

# Creamos el usuario Tomcat
sudo useradd -m -d /opt/tomcat -U -s /bin/false tomcat

# Actualizamos la caché del administrador de paquetes e instalamos el JDK
sudo apt update
sudo apt install -y openjdk-17-jdk

# Descargamos e instalamos Apache Tomcat, siempre con la ultima versión en mi caso esta es la ultima.
TomcatVersion="10.1.18" 
sudo wget https://dlcdn.apache.org/tomcat/tomcat-10/v${TomcatVersion}/bin/apache-tomcat-${TomcatVersion}.tar.gz -P /tmp
sudo tar xzvf /tmp/apache-tomcat-${TomcatVersion}.tar.gz -C /opt/tomcat --strip-components=1

# Añadimos los permisos necesarios
sudo chown -R tomcat:tomcat /opt/tomcat/
sudo chmod -R u+x /opt/tomcat/bin
 
# Configuramos los ususarios administradores de Tomcat.
cat <<EOF | sudo tee -a /opt/tomcat/conf/tomcat-users.xml
<tomcat-users>
    <role rolename="manager-gui"/>
    <user username="manager" password='user1' roles="manager-gui"/>
   <role rolename="admin-gui" />
<user username="admin" password='admin1' roles="manager-gui,admin-gui" />
</tomcat-users>
EOF

# Creamos la variable archivo y le asignamos la ruta al archivo context.xml almacenado en la variable 
rutaArchivo="/opt/tomcat/webapps/manager/META-INF/context.xml"

# Comentamos la línea en el archivo
sudo sed -i '/<Valve/,/<\/Valve>/ s/^/<!-- /; s/$/ -->/' "$rutaArchivo"

# Hacemos lo mismo para el siguiente archivo
rutaArchivo="/opt/tomcat/webapps/host-manager/META-INF/context.xml"
sudo sed -i '/<Valve/,/<\/Valve>/ s/^/<!-- /; s/$/ -->/' "$arcrutaArchivohivo"

# Capturamos la ruta del archivo con sudo update-java-alternatives -l y lo almacenamos en la variable java_home para usar la versión correcta
java_home=$(sudo update-java-alternatives -l | awk '{print $3}')

#Hacemos cat para añadir al fichero tomcat.service las siguientes líneas.
cat <<EOF | sudo tee /etc/systemd/system/tomcat.service
[Unit]
Description=Tomcat
After=network.target

[Service]
Type=forking

User=tomcat
Group=tomcat

Environment="JAVA_HOME=$java_home"
Environment="JAVA_OPTS=-Djava.security.egd=file:///dev/urandom"
Environment="CATALINA_BASE=/opt/tomcat"
Environment="CATALINA_HOME=/opt/tomcat"
Environment="CATALINA_PID=/opt/tomcat/temp/tomcat.pid"
Environment="CATALINA_OPTS=-Xms512M -Xmx1024M -server -XX:+UseParallelGC"

ExecStart=/opt/tomcat/bin/startup.sh
ExecStop=/opt/tomcat/bin/shutdown.sh

RestartSec=10
Restart=always

[Install]
WantedBy=multi-user.target
EOF

# Reiniciamos para aplicar los cambios
sudo systemctl daemon-reload


# Reiniciamos Tomcat para que se aplique la nueva configuración
sudo systemctl start tomcat

# Permisitmos que tomcat se inicie con el sistema
sudo systemctl enable tomcat

# Por ultimo permitimos el tráfico al puerto 8080 para aceptar solicitudes http
sudo ufw allow 8080
