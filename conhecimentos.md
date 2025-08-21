
## 1. Acessibilidade Web (A11Y): 
Como você garantiria que um website é acessível para pessoas com diferentes tipos de deficiências? Por favor, forneça
exemplos de técnicas ou práticas que você aplicaria."

- Usaria tags semânticas do HTML5 (como header, main, footer, nav) e atributos ARIA para ajudar leitores de tela. Também cuidaria de contraste de cores, tamanhos de fonte ajustáveis e navegação por teclado. Exemplo: botões e links com aria-label descritivos, formulários com label associados corretamente e evitar conteúdos que dependam só da visão.


## 2. Performance de Aplicativos Web: 
Descreva as estratégias que você utilizaria
para analisar e melhorar a performance de carregamento de um site. Inclua
tanto otimizações de front-end quanto considerações de back-end que
impactam a performance no lado do cliente."

- No front, otimizaria imagens (lazy loading, formatos modernos como WebP ou hospedados em nuvem. ex: Postimage), minificação de CSS/JS e uso de cache e CDN. No back-end, pensaria em, SSR ou mock em alguns casos e queries de banco mais otimizadas. Monitoraria com Lighthouse.


## 3. Responsive Design: 
Explique como você abordaria o design e o desenvolvimento de um site responsivo, garantindo uma ótima experiência de
usuário em dispositivos de diferentes tamanhos. Inclua considerações sobre layout, imagens e tipografia."

- Minha abordagem é mobile-first. Estruturo o layout em grids flexíveis (CSS Grid/Flexbox), testo em devices reais para validar.

## 4. Segurança no Front-End: 
Quais medidas você tomaria para aumentar a segurança em uma aplicação web para proteger contra vulnerabilidades
comuns, como cross-site scripting (XSS) e falsificação de solicitação em sites (CSRF)?"

- Para evitar injeções e ataques comuns, sempre valido e trato os dados de entrada. Utilizo configurações de segurança como CSP para limitar scripts externos e Secure. No caso de XSS, evito inserir HTML sem verificar. Já contra CSRF, costumo usar tokens únicos em formulários e checar de onde vem as requisições


## 5. SEO e Desenvolvimento Front-End: 
Como as práticas de desenvolvimento front-end podem impactar o SEO de um site? Dê exemplos de como você
otimizaria uma aplicação web para melhorar sua visibilidade nos motores de busca."

- O SEO é muito importante para front-end. Um HTML semântico melhora o entendimento dos buscadores. Também implementaria meta tags, sitemap, URLs amigáveis e uso correto de headings (h1, h2). Em SPAs, usaria SSR para renderizar conteúdo no servidor e facilitar as buscas.


## 6. Uso de Frameworks e Bibliotecas JavaScript: 
Discuta os prós e contras de usar frameworks/bibliotecas JavaScript (como React, Vue, Angular) versus
JavaScript puro (Vanilla JS) em projetos de desenvolvimento web. Em que situações você escolheria um em detrimento do outro?"

- Frameworks como React e Vue proporcionam maior agilidade no desenvolvimento e oferecem uma estrutura organizada para projetos complexos, embora possam adicionar peso e aumentar a complexidade da aplicação. Já o uso de JavaScript puro (Vanilla JS que foi o que eu usei nesse projeto) é mais leve e direto, sendo ideal para projetos menores, que demandam rapidez e simplicidade. Assim, optaria por frameworks em sistemas de maior porte, que exigem escalabilidade e manutenção a longo prazo, enquanto o JavaScript puro seria a escolha em páginas mais simples, com foco em desempenho imediato.


## . Gerenciamento de Estado em Aplicações SPA (Single Page Application):
Explique a importância do gerenciamento de estado em uma SPA e descreva uma abordagem ou ferramenta 
que você utilizaria para gerenciar o estado eficientemente."

- O estado é essencial em SPAs porque praticamente tudo na interface depende dele. Eu costumo usar ferramentas como Redux, Pinia ou até Zustand, dependendo do framework. Em projetos menores, a própria Context API já resolve bem. O que eu busco é controle e uma forma fácil de debugar, porque sem um bom gerenciamento o app vira uma bagunça e fica difícil manter.

## 8. Processo de Desenvolvimento e Deploy de Aplicações Web: 
Descreva o processo que você seguiria desde a concepção até o deploy de uma aplicação web,
incluindo etapas de planejamento, desenvolvimento, testes, e manutenção."

- Eu começaria entendendo bem os requisitos e criando protótipos simples pra alinhar expectativas. No desenvolvimento, usaria GitHub pra versionar e manter organizado. Faria testes automatizados com Jest ou Cypress pra garantir qualidade. No deploy, optaria por CI/CD, usando GitHub Actions e serviços como Vercel, Netlify ou até Docker em servidores cloud. Depois disso, acompanharia logs e métricas de performance, sempre adaptando e melhorando em pequenos ciclos.

## 9. Adaptação a Mudanças de Requisitos: 
Como você lida com mudanças de requisitos ou feedback de usuários que exigem alterações significativas em
um projeto já em desenvolvimento?

- Normalmente vejo mudanças como parte do processo. O ideal é avaliar impacto antes: se afeta arquitetura ou só interface. Escolho práticas ágeis (sprints curtos) e mantenho o cliente/usuário próximo para validar decisões rápidas. Isso ajuda a evitar retrabalho e mantém a aplicação alinhada com as necessidades.