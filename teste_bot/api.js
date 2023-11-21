const express = require('express');
const amazonSearch = require('./amazon.js');
const americanasSearch = require('./americanas.js');
const mercadolivreSearch = require('./mercadolivre.js');

const app = express();
const port = 3000;

app.get('/amazon', async (req, res) => {
  try {
    const result = await amazonSearch(req.query.value);
    res.json(result);
  } catch (error) {
    res.status(500).json({
      error: 'Erro ao executar o scrapping.',
      erro: error
    });
  }
});

app.get('/americanas', async (req, res) => {
  try {
    const result = await americanasSearch(req.query.value);
    res.json(result);
  } catch (error) {
    res.status(500).json({
      error: 'Erro ao executar o scrapping.',
      erro: error
    });
  }
});
app.get('/mercadolivre', async (req, res) => {
  try {
    const result = await mercadolivreSearch(req.query.value);
    res.json(result);
  } catch (error) {
    res.status(500).json({
      error: 'Erro ao executar o scrapping.',
      erro: error
    });
  }
});

app.listen(port, () => {
  console.log(`Servidor Node.js rodando na porta ${port}`);
});