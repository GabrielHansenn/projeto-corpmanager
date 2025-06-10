describe('Login', () => {
    it('Deve fazer login com credenciais válidas', () => {
        cy.visit('http://127.0.0.1:8000/login');

        cy.get('input[name="email"]').type('admin@admin.com.br');
        cy.get('input[name="password"]').type('admin123');
        cy.get('button[type="submit"]').click();

        cy.url().should('include', '/'); // ou rota pós-login
        cy.contains('Bem-vindo ao CorpManager'); // Ajuste conforme a sua tela inicial
    });

    it('Não deve fazer login com credenciais inválidas', () => {
        cy.visit('http://127.0.0.1:8000/login');

        cy.get('input[name="email"]').type('errado@example.com');
        cy.get('input[name="password"]').type('senhaerrada');
        cy.get('button[type="submit"]').click();

        cy.contains('These credentials do not match our records.').should('exist'); // Ajuste conforme sua validação
    });
});
