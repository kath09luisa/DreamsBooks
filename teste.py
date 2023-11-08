import requests
from bs4 import BeautifulSoup
import re
import pandas as pd
import math

url = 'https://www.amazon.com.br/s?k=acotar&i=stripbooks&__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3V08R7AMIVWRP&sprefix=acotar%2Cstripbooks%2C441&ref=nb_sb_noss_1'
headers = {'User-Agent':"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36"}

site = requests.get(url, headers=headers)
soup = BeautifulSoup(site.content, 'html.parser')
qtd_items = soup.find('div', id='a-row a-size-base a-color-base').get_text().strip()

print(qtd_items)
