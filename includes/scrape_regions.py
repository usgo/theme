from BeautifulSoup import BeautifulSoup as BS
import urllib

url = "http://192.168.1.142/drupal/node/26"
write_dir = '.'
page = urllib.urlopen(url).read()

div_ids = ['navwrap', 'navcol', 'extracol', 'postfooter']

soup = BS(page)

if write_dir == '':
    write_dir = '.'

for id in div_ids:
    tree = soup.find('div', id = id)
    if tree != None:
        f = open('%s/%s.cached.html' % (write_dir, id), 'w')
        f.write(tree.renderContents())
        f.close()
