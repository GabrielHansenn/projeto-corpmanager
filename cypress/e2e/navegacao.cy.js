describe('Navegação', () => {
    beforeEach(() => {
        // Faz login antes de cada teste
        cy.visit('http://127.0.0.1:8000/login');
        cy.get('input[name="email"]').type('admin@admin.com.br');
        cy.get('input[name="password"]').type('admin123');
        cy.get('button[type="submit"]').click();

        // Garante que o login foi bem-sucedido
        cy.url().should('not.include', '/login');
    });

    it('Deve navegar para a criação de funcionário', () => {
        cy.visit('http://127.0.0.1:8000/funcionarios/create');
        cy.url().should('include', '/funcionarios/create');
        cy.contains('Dados do Funcionário', { timeout: 10000 }).should('exist');
    });

    it('Deve navegar até a página de funcionários', () => {
        cy.visit('http://127.0.0.1:8000/funcionarios');
        cy.contains('Adicionar Funcionário', { timeout: 10000 }).should('exist');
    });

    it('Deve navegar até a página de dashboard', () => {
        cy.visit('http://127.0.0.1:8000/dashboard');
        cy.contains('Gerar PDF', { timeout: 10000 }).should('exist'); // Ajuste conforme texto real
    });
});
