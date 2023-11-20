const puppeteer = require('puppeteer');
const fs = require('fs');

async function handleCookiesPopup(page) {
    const cookiesButton = await page.$('#sp-cc-accept');
    if (cookiesButton) {
        await cookiesButton.click();
    }
}

const amazonSearch = async (value) => {
    console.log('Connecting to Scraping Browser...');
    const browser = await puppeteer.launch({
      headless: false,
      defaultViewport: null,
    });
        // Search parameters
        const page = await browser.newPage();
        const searchPhrase = value?.toLowerCase() || 'Harry Potter'; // Set your search phrase here
        const scrapeToPage = 1; // Set the desired page to scrape to
        const busca = "Livros";


        console.log('Search phrase:', searchPhrase);
        console.log('Scrape to page:', scrapeToPage);

        // Navigate to Amazon's cart page
        const homeUrl = 'https://www.amazon.com.br/gp/cart/view.html';
        await page.goto(homeUrl);

        await handleCookiesPopup(page); // Call the function to handle cookies window

        await page.waitForSelector('#nav-search-dropdown-card');
        await page.click('#nav-search-dropdown-card');
        await page.type('#nav-search-dropdown-card', busca);
        await page.click('#nav-search-dropdown-card', busca);
        await page.waitForSelector('#twotabsearchtextbox');
        // Type the search phrase and click the search button
        await page.type('#twotabsearchtextbox', searchPhrase);
        await page.click('#nav-search-submit-button');
       
        // Wait for the search results page to load
        await page.waitForSelector('.s-widget-container');
                 
        const url = page.url(); // Get the current URL after the search
        
        const cardData = [];

        async function scrapePage(url, currentPage = 1, scrapeToPage = null) {
            console.log("Scraping page " + currentPage + "...");
            if (scrapeToPage !== null && currentPage > scrapeToPage) {
                return; // Stop scraping if the current page exceeds the target page
            }
            //  Navigate to the URL
            await page.goto(url);

            await handleCookiesPopup(page); // Call the function to handle cookies window

            //  Wait for selector
            await page.waitForSelector('.s-widget-container');
                  
            const pageCardData = await page.evaluate(() => {
                const cards = Array.from(document.querySelectorAll('.s-widget-container'));
                
                const cardInfo = cards.map(card => {
                    // Product name
                  const productName = card.querySelector('h2')?.textContent.trim();

                    // Price 
                    const priceElement = card.querySelector('.a-price .a-offscreen');
                    const price = priceElement ? priceElement.textContent : "N/A";

                    const links = card.querySelector('.a-link-normal.s-no-outline')?.getAttribute('href');
                    const image = card.querySelector('.s-image')?.getAttribute('src');

                    if (productName) {
                        return {
                            productName,
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
};

module.exports = amazonSearch;