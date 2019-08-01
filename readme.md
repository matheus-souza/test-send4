# SEND 4 CODE CHALLENGE
Teste realizado para avaliar o conhecimento e capacidade de candidatos às vagas de programação/desenvolvimento na Send 4.

## Executando o projeto
### Requisitos
- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/)
- [Docker compose](https://docs.docker.com/compose/)

### Baixando o projeto
```bash
git clone --recursive https://github.com/matheus-souza/test-send4.git
```
### Executando o projeto
Acesse a pasta do projeto ```cd test-send4```

Copie o arquivo ```.env.laradock.dev``` para a pasta do submodulo
```bash
cp .env.laradock.dev laradock/.env
```

Execute o arquivo run
```bash
./run
```

## Documentação do projeto
### Documentação da API
A documentação da API pública está disponível [neste endereço](https://documenter.getpostman.com/view/1774155/SVYnT26p)

O ambiente para importar no Postman está disponível na pasta [doc](https://github.com/matheus-souza/test-send4/tree/master/doc)

Imagens de exemplo dos resultados obtidos pelo Postman estão disponíveis no diretório [doc/images](https://github.com/matheus-souza/test-send4/tree/master/doc/images)

### Acesso pelo navegador
Após executar o projeto conforme a documentação acesse [localhost](http://localhost) para ter acesso as telas do projeto
