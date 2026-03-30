Caso de Estudo: Centro de Informática da Universidade Pedagógica de Maputo


Problema: O controlo de estagiários, supervisores e avaliações é feito de forma
manual pela secretária, o que resulta em perda de tempo, falhas de registo e
dificuldades na consulta de informações. 

Contexto:Centro de Informática da Universidade Pedagógica de Maputo. 

Dentro: Contagem automática, Fora: Mostrar foto do estagiário. 

Stakeholders
Primários:
 Estagiário, aquele que executa as actividades atribuídas pelo supervisor. 
 Secretária, aquela que adiciona,remove estagiário.
  Supervisor, aquele que dá acompanhamento ao estagiário.\
 
  Secundários
 Administrador, aquele que regista a secretária,atribui os previlégios e faz
manutenção do sistema.

 Requisitos Funcionais
 Gerir Estagiário
 RF01:O sistema deve permitir registar novo estagiário, incluindo dados
pessoais (nome, curso, ano, BI, carta de pedido de estágio como anexos), académicos e de contacto(email e telefone)

  RF02: O sistema deve permitir visualizar, editar e actualizar os dados de um
estagiário; 

 RF03:O sistema deve permitir encerrar o estágio do estagiário no final do
estágio, mantendo o seu histórico.

  Gerir Supervisor 
  RF04: O sistema deve permitir o registo de supervisor (código, nome, cargo, área de formação, área de atuação e tarefas;
   RF05: O sistema deve permitir associar um supervisor a uma repartição
 RF06: O sistema deve permitir associar a repartição a um departamento

 Gerir Departamento
 RF07: O sistema deve permitir o registo de departamento (código, nome, abreviatura, descrição e email). 2
 RF08: O sistema deve permitir visualizar, editar e actualizar dados do departamento

 Gerir Repartição
 RF09: O sistema deve permitir o registo de repartição (código, nome, abreviatura, descrição)  RF010: O sistema deve permitir visualizar, editar e actualizar dados da
repartição
 RF011: O sistema deve permitir associar a repartição a um departamento

Gerir Avaliação
 RF012: O sistema deve permitir registar os dados de avaliação (código, pontualidade, qualidade de trabalho, colaboração, iniciativa, classificação); 
 RF013: O sistema deve permitir importação do relatório;  O sistema deve permitir inserir comentário por parte do supervisor

 Gerir Documentos
  RF014: Upload e gestão de termos de compromisso, planos de estágio, e
certificados

 Gerir Relatórios
RF015: Listar estagiários por curso, ano, Departamento ou supervisor.

 Requisitos Não Funcionais
 RNF01: O sistema deve possuir uma interface gráfica intuitiva e fácil de usar, permitindo que qualquer utilizador com conhecimentos básicos de informática consiga operá-lo.
  RNF02: O sistema deve responder às requisições do utilizador em no máximo 3
segundos, garantindo fluidez nas operações de registo, pesquisa e visualização.
  RNF03: O sistema deve assegurar a integridade dos dados, evitando perdas
durante gravações, actualizações ou falhas no sistema. 
 RNF04: O sistema deve implementar autenticação por nome de utilizador e senha, com níveis de acesso definidos (administrador,supervisor, e estagiário). 
 RNF05: O sistema deve permitir cópias de segurança automáticas e restauração
de dados em caso de falha.
  RNF06: O sistema deve ser acessível via navegador web e compatível com os
principais sistemas operativos (Windows, Linux e macOS).
  RNF07: O sistema deve permitir a adição de novos módulos sem necessidade de grandes alterações na estrutura. 
 RNF08: O código-fonte deve ser modularizado, seguindo o padrão MVC
(Model-View-Controller) para facilitar manutenção e futuras actualizações. 
 RNF09: O sistema deve utilizar um base de dados relacional para
armazenamento consistente e seguro das informações.
  RNF010 :O sistema deve estar disponível 24h por dia, com no máximo 5% de
tempo de inatividade para manutenção. 
 RNF011: O sistema deve manter registos de todas as operações realizadas pelos
utilizadores. 
ID--User Story -------                            Critérios de Aceitação------               Prioridade----   - Estimativa
US01|Como supervisor, quero criar conta para acessar o sistema. |Deve validar email esenha.| Must| M
US02|Como secretária, quero ver am quantidade de estagiários registados. |Deve mostrar a quantidade de estagiários no sistema|Must| M
US03|Como secretária, quero atualizar os dados dos estagiários no sistema.| Deve permitir atualizar dados| Must| M
US04|Como utilizador, visuatualizar as actividades feitas o durante estágio|Deve permitir visualisar actividades|Must| M
US05|Como utilizador, quero verificarmensalmente quantos estagiários frequentam o CIUP.|Deve permitir pesquisa por mês dos dados|Should| C
US06|Como utilizador, quero registar supervisor |Deve aceitar registo de supervisor. |Should| M
US07|Como utilizador, quero registar supervisor.| Deve aceitar registo de supervisor. |Must| M
US08|Como utilizador, quero registartempo de duração do estágio| Deve guardar tempo duração do estágio.| Should| M
US09|Como utilizador, quero visualizar desempenho dos estagiário| Mostrar relatórios de desempenho.| Must| M
US010|Como utilizador, quero receber notificações de fim de estágio.| Enviar pelo menos 1 lembrete próximo do fim do estágio.| Should| C
US011|Como utilizador, quero editar meus dados pessoais|Permitir atualização de perfil.| Should| M
US012|Como administrador, quero visualizar lista de utilizadores.|Mostrar nome e email.| Must| M
US013|Como administrador, quero bloquear utilizador se necessário |Conta bloqueada não pode fazer login.| Must| M
US014|Como utilizador, quero ver actividades dos estagiários. |Mostrar lista organizada por temas| Should| M
US015|Como utilizador, quero terminar sessão (logout).| Deve sair da conta.| Should |M

Quadro de Tarefas(Trello)
https://trello.com/b/jHhpdV51/desenvolvimento-de-sistema)
