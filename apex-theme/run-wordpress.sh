#!/bin/bash

# Este script simula a execução de um site WordPress para desenvolvimento

echo "Iniciando servidor de desenvolvimento para Apex WordPress Theme..."
echo "URL do site: http://localhost:5000"
echo "Utilize este ambiente para testar o tema antes da instalação no WordPress."
echo "Pressione Ctrl+C para finalizar o servidor."

# Inicia um servidor PHP simples na raiz do tema
php -S 0.0.0.0:5000 -t ./apex-theme/
