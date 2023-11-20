const puppeteer = require('puppeteer-extra');
const StealthlPlugin = require('puppeteer-extra-plugin-stealth');

const url = "https://www.americanas.com.br/";
const searchFor = 'Harry Potter';

puppeteer.use(StealthlPlugin())

const americanasSearch = puppeteer.launch({ headless: false }).then(async browser => {
    
    const page = await browser.newPage();
    await page.goto(url);
   
    await page.waitForSelector('.search__InputUI-sc-1wvs0c1-2.dRQgOV');

    await page.type('.search__InputUI-sc-1wvs0c1-2.dRQgOV', searchFor);

    await Promise.all([
        page.waitForNavigation(),
        await page.click('.search__SearchButtonUI-sc-1wvs0c1-4.laEttB'),
        
    ]);

    const pageCardData = await page.evaluate(() => {
        
          const productName = document.querySelector('h3')?.textContent.trim();

            // Price 
            const priceElement = document.querySelector('.src__Text-sc-154pg0p-0.price__PromotionalPrice-sc-i1illp-1.BCJl.price-info__ListPriceWithMargin-sc-z0kkvc-2.juBAtS');
            const price = priceElement ? priceElement.textContent : "N/A";


            const links= document.querySelector('.inStockCard__Link-sc-8xyl4s-1.ffLdXK')?.getAttribute('href');
            
            if (productName) {
                return {
                    productName,
                    price,
                    links
                };
            } else {
                return null; // Return null for empty items
            }
        })
        //console.log(pageCardData);

        if(pageCardData){ 
            console.log(pageCardData);
            await page.waitForTimeout(3000); 
            await browser.close();
    }
    });

    module.exports = americanasSearch;



