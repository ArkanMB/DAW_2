#!/bin/bash

# Desplegamos la plantilla de CloudFormarion
aws cloudformation deploy \
--template-file ubuntu.yml \
--stack-name "Tomcat" \
--capabilities CAPABILITY_NAMED_IAM