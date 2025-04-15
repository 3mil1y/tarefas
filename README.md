# Gerenciador de Tarefas

## Visão Geral
Este é um aplicativo simples de gerenciamento de tarefas desenvolvido em PHP. Ele permite que os usuários adicionem, atualizem o status e excluam tarefas. O sistema utiliza sessões para armazenar as tarefas temporariamente e segue uma arquitetura MVC (Model-View-Controller).

## Estrutura do Projeto
- **app/**: Contém os componentes principais do aplicativo, incluindo controladores, modelos, entidades e layouts.
  - **components/**: Componentes reutilizáveis, como formulários e listas.
  - **controllers/**: Controladores responsáveis por gerenciar as requisições e lógica de negócios.
  - **core/**: Classes base e utilitárias, como o roteador, sessão e controlador base.
  - **entities/**: Classes que representam entidades do sistema, como `Task`.
  - **models/**: Modelos que gerenciam os dados e interagem com as entidades.
  - **views/**: Arquivos de visualização que renderizam o HTML.
- **public/**: Contém os arquivos públicos, como CSS, JavaScript e o ponto de entrada `index.php`.
- **.htaccess**: Configuração para URLs amigáveis.

## Funcionalidades
- Adicionar novas tarefas com status inicial.
- Atualizar o status de uma tarefa (Pendente, Em Andamento, Concluída).
- Excluir tarefas.
- Reiniciar o sistema para redefinir as tarefas.

## Requisitos
- Servidor web com suporte a PHP (ex.: XAMPP, WAMP).
- PHP 7.4 ou superior.

## Instalação
1. Clone este repositório em seu servidor local:
   ```bash
   git clone <url-do-repositorio>
   ```
2. Certifique-se de que o diretório `public/` seja o diretório público do servidor.
3. Configure o arquivo `.htaccess` para ativar URLs amigáveis.
4. Acesse o aplicativo no navegador através do endereço configurado no servidor.

## Uso
- Acesse a página inicial para visualizar a lista de tarefas.
- Use o menu de navegação para adicionar novas tarefas ou reiniciar o sistema.
- Atualize o status ou exclua tarefas diretamente na lista.