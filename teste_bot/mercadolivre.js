const puppeteer = require('puppeteer');
const fs = require('fs');

const mercadolivreSearch = async (value) => {
    console.log('Connecting to Scraping Browser...');
    const browser = await puppeteer.launch({
      headless: false,
      defaultViewport: null,
    });
        // Search parameters
        const page = await browser.newPage();
        const searchPhrase = value?.toLowerCase() || 'After'; // Set your search phrase here
        const scrapeToPage = 1; // Set the desired page to scrape to


        console.log('Search phrase:', searchPhrase);
        console.log('Scrape to page:', scrapeToPage);

        // Navigate to Amazon's cart page
        const homeUrl = 'https://www.mercadolivre.com/';
        await page.goto(homeUrl);

        await page.waitForSelector('#cb1-edit');
        // Type the search phrase and click the search button
        await page.type('#cb1-edit', searchPhrase);
        await page.click('.nav-search-btn');
       
        // Wait for the search results page to load
        await page.waitForSelector('.ui-search-layout.ui-search-layout--grid');
                 
        const url = page.url(); // Get the current URL after the search
        
        const cardData = [];

        async function scrapePage(url, currentPage = 1, scrapeToPage = null) {
            console.log("Scraping page " + currentPage + "...");
            if (scrapeToPage !== null && currentPage > scrapeToPage) {
                return; // Stop scraping if the current page exceeds the target page
            }
            //  Navigate to the URL
            await page.goto(url);

            //  Wait for selector
            await page.waitForSelector('.ui-search-layout__item');
                  
            const pageCardData = await page.evaluate(() => {
                const cards = Array.from(document.querySelectorAll('.ui-search-layout__item'));
                
                const cardInfo = cards.map(card => {
                    // Product name
                  const productName = card.querySelector('h2')?.textContent.trim();

                    // Price 
                    const priceElement = card.querySelector('.ui-search-price__second-line');
                    const price = priceElement ? priceElement.textContent : "N/A";

                    const links = card.querySelector('.ui-search-item__group__element.ui-search-link')?.getAttribute('href');
                    const image = card.querySelector('.ui-search-result-image__element')?.getAttribute('src');

                    if (productName) {
                        return {
                            name: productName.slice(0, 50),
                            price,
                            link: links,
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

        await scrapePage(url, 1, scrapeToPage);

        console.log('Scraping finished.');

        //const outputFilename = 'scrapeData.json';
        //fs.writeFileSync(outputFilename, JSON.stringify(cardData, null, 2), 'utf8');
        //console.log(`data saved to ${outputFilename}`);
   
        await browser.close();

        return cardData

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
    "name": "After, de Todd, Anna. Série After (1), vol. 1. Edi",
    "price": "R$21,99",
    "link": "https://www.mercadolivre.com.br/after-de-todd-anna-serie-after-1-vol-1-editora-schwarcz-sa-capa-mole-em-portugus-2014/p/MLB19297774?pdp_filters=category:MLB437616#searchVariation=MLB19297774&position=9&search_layout=grid&type=product&tracking_id=f665ffb6-371b-482a-9d72-a5a73b87f48e",
    "image": "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
    }
]

const sherlock = [
    {
    "name": "Sherlock Holmes - Um estudo em vermelho, de Conan ",
    "price": "R$23,04",
    "link": "https://www.mercadolivre.com.br/sherlock-holmes-um-estudo-em-vermelho-de-conan-doyle-arthur-serie-classicos-da-literatura-mundial-luxo-ciranda-cultural-editora-e-distribuidora-ltda-capa-dura-em-portugus-2021/p/MLB19368400?pdp_filters=category:MLB437616#searchVariation=MLB19368400&position=7&search_layout=grid&type=product&tracking_id=4f7144a5-1b16-49fe-968b-f33aa1b5b55b",
    "image": "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
    }
]

module.exports = mercadolivreSearch;