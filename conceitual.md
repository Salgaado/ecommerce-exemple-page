#Teste Conceitual

Supondo que a plataforma SpiritShop está enfrentando um problema: apesar do site
ser responsivo, muitos usuários têm relatado que a experiência de uso no mobile é
inferior, principalmente devido a tempos de carregamento lentos e dificuldades na
interação com elementos da UI em telas menores, eu agiria assim:


##1. Como você diagnosticaria e identificaria as causas específicas desses problemas de performance e usabilidade no mobile?

O primeiro passo seria realizar testes de performance usando ferramentas como Lighthouse, PageSpeed Insights e WebPageTest, para entender quais pontos estão impactando mais o carregamento no mobile. Além disso, analisaria o uso de imagens, scripts e CSS para identificar gargalos. Também faria testes manuais em dispositivos reais, porque muitas vezes a simulação não mostra com clareza problemas de interação e responsividade. Dessa forma, consigo ter uma visão completa tanto do lado técnico quanto da experiência do usuário.

##2. Que estratégias e ferramentas você utilizaria para otimizar a performance do site no mobile?

Para performance, aplicaria otimizações como compressão e lazy loading de imagens, minificação de arquivos CSS e JS, uso de cache e CDN, além de dividir scripts em bundles menores (code splitting) para evitar carregamento desnecessário. Monitoraria com Lighthouse e Core Web Vitals. Também revisaria dependências externas, removendo o que não for essencial. Com isso, o site tende a ficar muito mais rápido e leve para o usuário no mobile.

##3. Como você melhoraria a usabilidade da interface para usuários de dispositivos móveis, garantindo que a experiência seja tão boa quanto no desktop?

No mobile, faria interfaces mais simples, com botões maiores e áreas de clique acessíveis. Ajustaria o espaçamento e a hierarquia visual para facilitar a leitura em telas menores. Também aplicaria boas práticas de UX mobile, como navegação clara, feedback imediato em ações (toques, formulários, etc.) e evitaria sobrecarregar o usuário com muitos elementos na mesma tela. Testaria as alterações em dispositivos reais para validar a experiência. Assim, a navegação no mobile ficaria fluida e intuitiva, tão boa quanto no desktop.
