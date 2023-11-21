const puppeteer = require("puppeteer-extra");

puppeteer.use(require("puppeteer-extra-plugin-stealth")());

const americanasSearch = async (value) => {

  const url = "https://www.americanas.com.br/";
  const searchFor = value?.toLowerCase() || "after";

  const browser = await puppeteer.launch({
    headless: true,
  });
  const page = await browser.newPage();


  await page.goto(url);

  await page.waitForSelector(".search__InputUI-sc-1wvs0c1-2.dRQgOV");

  await page.type(".search__InputUI-sc-1wvs0c1-2.dRQgOV", searchFor);

  await Promise.all([
    page.waitForNavigation(),
    await page.click(".search__SearchIcon-sc-1wvs0c1-5.hsFJWA"),
  ]);

  const newUrl = page.url();
  
  const cardData = [];

  async function scrapePage(url) {
    
    await page.goto(url);

    await page.waitForSelector('.inStockCard__Link-sc-8xyl4s-1.ffLdXK');

    const pageCardData = await page.evaluate(() => {
      const cards = Array.from(document.querySelectorAll('.col__StyledCol-sc-1snw5v3-0.jGlQWu.src__ColGridItem-sc-122lblh-1.cJnBan'))
      
      const cardInfo = cards.map(card => {
        const productCard = card.querySelector(
          ".inStockCard__Link-sc-8xyl4s-1.ffLdXK"
        );
        const productName = productCard.querySelector("h3")?.textContent.trim();

        // Price
        const price = productCard.querySelector(
          ".src__Text-sc-154pg0p-0.price__PromotionalPrice-sc-i1illp-1.BCJl.price-info__ListPriceWithMargin-sc-z0kkvc-2.juBAtS"
        ).textContent;

        const links = productCard?.getAttribute("href");
        const image = productCard.querySelector('.src__LazyImage-sc-xr9q25-0.fSBXxM')?.getAttribute('src');

        if (productName) {
          return {
            name: productName.slice(0, 50),
            price,
            link: 'https://www.americanas.com.br' + links,
            image
          };
        } else {
          return null; // Return null for empty items
        }
      }).filter(card => card !== null);

      return cardInfo;
    });

    cardData.push(...pageCardData);
  }

  await scrapePage(newUrl);

  await page.waitForTimeout(3000);
  await browser.close();

  //console.log(pageCardData, [pageCardData])
  return cardData;

  switch (value) {
    case 'after':
      return after
      break;
    case 'sherlock':
      return sherlock
      break;

    default:
      return after
      break;
  }
};

const after = [
  {
  "name": "After Vol 1 - Tudo Começa Aqui",
  "price": "R$ 28,99",
  "link": "https://www.americanas.com.br/produto/120596865/after-vol-1-tudo-comeca-aqui?pfm_carac=after&pfm_index=1&pfm_page=search&pfm_pos=grid&pfm_type=search_page&offerId=5cc7831ef216c95bde841a40&buyboxToken=smartbuybox-acom-v2-d696e5a4-07ad-4015-ae88-ec7f502c361a-2023-11-21 01:17:05+0000-none-default",
  "image": "https://images-americanas.b2w.io/produtos/120596865/imagens/after-vol-1-tudo-comeca-aqui/120596865_1_medium.jpg"
  }
]

const sherlock = [
  {
  "name": "Sherlock Holmes - Um Estudo Em Vermelho",
  "price": "R$ 21,43",
  "link": "https://www.americanas.com.br/produto/3207159561/sherlock-holmes-um-estudo-em-vermelho?pfm_carac=sherlock&pfm_index=19&pfm_page=search&pfm_pos=grid&pfm_type=search_page&offerId=629701bb234ca7e6fd9512be&buyboxToken=smartbuybox-acom-v2-254fcfdc-9696-4e85-96c6-288606084382-2023-11-21 01:25:23+0000-none-default",
  "image": "https://images-americanas.b2w.io/produtos/3207159561/imagens/sherlock-holmes-um-estudo-em-vermelho/3207159561_1_medium.jpg"
  }
]

module.exports = americanasSearch;



