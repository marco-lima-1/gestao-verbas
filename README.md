
# 📌 Projeto: Gestão de Verbas - PharmaViews

Este projeto foi um desenvolvimento Full Stack como parte do **teste prático para uma vaga de Web Developer**. Ele permite o **cadastro, edição, listagem e exclusão** de ações de marketing, garantindo o gerenciamento adequado das verbas alocadas.

## 📌 Objetivo do Projeto
Desenvolver uma **interface web responsiva e interativa** para o gerenciamento de **ações de marketing**. O sistema permite:
- Cadastrar uma nova ação de marketing.
- Definir uma data prevista para a ação (**mínimo de 10 dias no futuro**).
- Definir o investimento previsto para a ação.
- Listar todas as ações cadastradas.
- Editar ou excluir ações.

---

## 🚀 Tecnologias Utilizadas
O projeto foi desenvolvido utilizando as seguintes tecnologias:

### **Backend**
- **PHP 8.4** com **Laravel 12**
- **PostgreSQL** como banco de dados

### **Frontend**
- **HTML5, CSS3 e JavaScript**
- **Bootstrap 3.4** para estilização e responsividade
- **JQuery** para interatividade
- **DataTables** para exibição dinâmica dos dados
- **jQuery UI Datepicker** para seleção de datas (**DD/MM/YYYY**)

### **Outras Bibliotecas**
- **jQuery Mask** para formatação de valores monetários

---

## 📌 Funcionalidades Implementadas
✅ **Cadastro** de ações de marketing.
✅ **Edição** de registros via modal.
✅ **Exclusão** de ações cadastradas.
✅ **Validação de data**: apenas datas **10 dias no futuro** podem ser cadastradas.
✅ **Formatação de valores**: investimento aparece corretamente como **R$ 1.000,00**.
✅ **Listagem dinâmica** com **DataTables**.

---

## 📌 Como Executar o Projeto

### **1️⃣ Clonar o Repositório**
Execute o comando abaixo para clonar o projeto:

```sh
git clone https://github.com/marco-lima-1/gestao-verbas
cd gestao-verbas
```

### **2️⃣ Criar o Arquivo `.env`**
Após clonar o projeto, crie um arquivo **`.env`** baseado no **`.env.example`**:

```sh
cp .env.example .env  # Para Linux/macOS
copy .env.example .env  # Para Windows (CMD)
```

Agora, edite o `.env` para configurar as credenciais do banco de dados:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

⚠️ **IMPORTANTE:** Certifique-se de remover os `#` antes das configurações do banco de dados.

### **3️⃣ Instalar as Dependências**
Certifique-se de ter **PHP 8.4, Composer e PostgreSQL** instalados e rode o comando abaixo:

```sh
composer install
```

### **4️⃣ Gerar a APP_KEY**
O Laravel requer uma **chave de aplicação** para funcionamento correto. Gere a chave executando:

```sh
php artisan key:generate
```

### **5️⃣ Rodar as Migrations**
Execute o seguinte comando para criar as tabelas:

```sh
php artisan migrate
```

### **6️⃣ Iniciar o Servidor Laravel**
Agora, rode o servidor local do Laravel:

```sh
php artisan serve
```

O sistema estará disponível em:
```
http://127.0.0.1:8000/
```

---

## 📌 Dependências Necessárias

Quem clonar o repositório **precisa instalar as dependências** do Laravel, pois a pasta `vendor/` não é enviada para o GitHub.

🔹 **Após clonar o repositório, rode:**
```sh
composer install
```

Se for necessário compilar assets front-end (CSS/JS), também execute:
```sh
npm install
```

Isso garantirá que o Laravel tenha todos os pacotes necessários para funcionar corretamente.

---

## 💻 Imagem da interface com dados fictícios:
![image](https://github.com/user-attachments/assets/ff1b402f-ce57-478b-be3f-0b60076430d7)

## 💻 Escolher Ação:
![Screenshot 2025-03-17 235504](https://github.com/user-attachments/assets/a05828b3-54e2-429d-a644-8d94bdd33c80)

## 💻 Caso a data prevista não tenha no mínimo 10 dias a partir da data de cadastro:
![Screenshot 2025-03-17 235512](https://github.com/user-attachments/assets/43d44129-3fc9-4e0b-b367-e002cf22c21f)

## 💻 Editar ação:
![image](https://github.com/user-attachments/assets/726d1d2a-cbbb-4caf-b53a-b5207c9b0a4a)

## 💻 Banco de dados:
![image](https://github.com/user-attachments/assets/62916b96-177b-4485-850b-00a5f40c1fcc)


## 📌 Melhorias Futuras

- **Implementar autenticação de usuários com Laravel Breeze ou Laravel Sanctum.**
- **Criar logs detalhados para ações como cadastro, edição e exclusão.**
- **Adicionar paginação nos registros para melhor performance em grandes volumes de dados.**
- **Melhorar a responsividade da aplicação em telas menores.**
- **Criar testes automatizados para garantir a estabilidade do sistema.**
- **Implementar sistema de permissões para usuários com diferentes níveis de acesso.**
- **Criar um painel de dashboard com estatísticas das ações de marketing.**
