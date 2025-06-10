describe('Funcionários', () => {
    beforeEach(() => {
        // Login antes de cada teste
        cy.visit('http://127.0.0.1:8000/login');
        cy.get('input[name="email"]').type('admin@admin.com.br');
        cy.get('input[name="password"]').type('admin123');
        cy.get('button[type="submit"]').click();
    });

    it('Deve criar um novo funcionário com dados aleatórios', () => {
        // Gerando dados únicos e aleatórios
        const timestamp = Date.now();
        const nome = `Funcionário ${timestamp}`;
        const email = `func${timestamp}@empresa.com`;
        const cpf = `${Math.floor(100 + Math.random() * 900)}.${Math.floor(100 + Math.random() * 900)}.${Math.floor(100 + Math.random() * 900)}-00`;
        const telefone = `(11) 9${Math.floor(1000 + Math.random() * 9000)}-${Math.floor(1000 + Math.random() * 9000)}`;

        cy.visit('http://127.0.0.1:8000/funcionarios/create');

        cy.get('input[name="nome"]').type(nome);
        cy.get('input[name="cpf"]').type(cpf);
        cy.get('input[name="telefone"]').type(telefone);
        cy.get('input[name="email"]').type(email);
        cy.get('input[name="cargo"]').type('Desenvolvedor');
        cy.get('input[name="salario"]').type('4000');
        cy.get('input[name="data_admissao"]').type('2023-05-01');

        cy.get('button[type="submit"]').click();

        // Verifica se o funcionário foi criado
        cy.contains(nome).should('exist');
    });
});
