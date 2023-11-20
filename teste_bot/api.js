const express = require('express');
const amazonSearch = require('./amazon.js');

const app = express();
const port = 3000;

app.get('/search', async (req, res) => {
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

app.listen(port, () => {
  console.log(`Servidor Node.js rodando na porta ${port}`);
});