Arquitetura

Requisitos principais

RF01:O sistema deve permitir registar novo estagiário, incluindo dados
pessoais (nome, curso, ano, BI, carta de pedido de estágio como anexos), académicos e de contacto(email e telefone)

 RF02: O sistema deve permitir visualizar, editar e actualizar os dados de um
estagiário;

 RF03:O sistema deve permitir encerrar o estágio do estagiário no final do
estágio

Padrão arquitectónico escolhido
MVC

Stack tecnológica completa
FrontEnd- HTML-CSS 
Backend- PHP
Base de Dados -MySql

Diagrama desenhado (imagem)

|----------------|
 FrontEnd|<-HTML CSS
|----------------|
 BackEnd|<- Php
 |---------------|
 DataBase|<- MySql
 |---------------|
 
 Justificativa das escolhas
  Escolhi essa arquitectura porque ela resolve facilmente o registo e visualizacao dos estagiariose supervisores. Tenho dominio da arquitectura. E possivel aplicar no tempo estabelecido para entrega. Mitigacao de risco identificado eh adicao de modulos simples e praticos.