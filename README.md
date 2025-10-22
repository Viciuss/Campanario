# 💬 Site de Confissões

[![PHP](https://img.shields.io/badge/PHP-7.4+-blue)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange)](https://www.mysql.com/)
[![jQuery](https://img.shields.io/badge/jQuery-3.7.1-blue)](https://jquery.com/)

Um site simples para **enviar, ouvir e listar confissões** de forma completamente anônima usando **PHP OOP**, **MySQL** e **AJAX com jQuery**.

---

## ⚡ Funcionalidades

- Envio de confissões via formulário.
- Listagem dinâmica em tempo real.
- Backend seguro usando Prepared Statements.
- Diferentes interfaces em `/INICIO/`, `/INPUT/` e `/OUTPUT/`.

---

## 📂 Estrutura do Projeto

/API/  
├─ api.php  
└─ Confissao.php  

/INICIO/  
├─ index.html  
├─ style.css  
└─ script.js  

/INPUT/  
├─ index.html  
├─ fale.css  
└─ script.js  

/OUTPUT/  
├─ index.html  
├─ ouvir.css  
└─ script.js  

---

## ⚙️ Instalação Rápida

1. Clone o repositório:
```bash
git clone https://github.com/Viciuss/site-confissoes.git

Configure o banco MySQL:

sql
CREATE DATABASE Campanario;

CREATE TABLE confissoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    confissao TEXT NOT NULL,
);
Ajuste usuário e senha no arquivo Database.php dentro de /API/.

Abra qualquer index.html no navegador e teste o site.
````
🚀 Uso  
/INPUT/: Formulário para enviar confissões.

/OUTPUT/: Área para ouvir ou visualizar confissões.

/INICIO/: Página inicial ou landing page.

📌 Contato  
Desenvolvido por Viciuss  
GitHub: https://github.com/Viciuss
