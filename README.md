# User Auth

Sistema simples de cadastro e login de usuários em PHP.

## 🚀 Como executar

1. Copie a pasta do projeto para dentro da pasta `htdocs` da sua instalação do **XAMPP**.
2. Inicie o **XAMPP** e ative os serviços **Apache**.
3. No navegador, acesse:  
   `http://localhost/proj_2_auth/index.php`

---

## 👨‍🎓 Aluno

- **Rodrigo Bassalobre Garcia** – RA: 2007642

---

## ✅ Funcionalidades

- Cadastro de Usuário

  - Validar se o e-mail é válido.
  - Validar se a senha é forte (mín. 8 caracteres, ao menos 1 número e 1 maiúscula).
  - Gerar hash seguro da senha com password_hash.
  - Não permitir e-mails duplicados.

- Login de Usuário

  - Validar e-mail e senha fornecidos.
  - Comparar senha com password_verify.
  - Retornar mensagem de sucesso ou falha.

- Reset de Senha
  - Permitir atualizar a senha de um usuário existente.
  - Aplicar novamente as regras de senha forte.
  - Substituir pela nova senha com password_hash.

---

## ⚠️ Limitações

- Não precisa persistir dados (uso apenas de arrays).
- Não precisa interface de login/usuário (pode ser via chamadas diretas em funções).
- Não precisa input via formulário → valores podem estar fixos em arrays/variáveis.
- Não usar frameworks externos. Apenas PHP puro rodando no XAMPP.

---

## 💡 Casos de Uso

- Caso 1 — Cadastro válido
  Entrada: nome Maria Oliveira, email maria@email.com, senha Senha123.
  Resultado esperado: usuário cadastrado com sucesso.
- Caso 2 — Cadastro com e-mail inválido
  Entrada: nome Pedro, email pedro@@email, senha Senha123.
  Resultado esperado: mensagem de erro → “E-mail inválido”.
- Caso 3 — Tentativa de login com senha errada
  Entrada: email joao@email.com, senha Errada123.
  Resultado esperado: mensagem de erro → “Credenciais inválidas”.
- Caso 4 — Reset de senha válido
  Entrada: id 1, nova senha NovaSenha1.
  Resultado esperado: senha alterada com sucesso.
- Caso 5 — Cadastro de usuário com e-mail duplicado
  Entrada: email já existente no array.
  Resultado esperado: mensagem de erro → “E-mail já está em uso”.
