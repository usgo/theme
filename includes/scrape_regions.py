from BeautifulSoup import BeautifulSoup as BS
import urllib

url = "http://www.usgo.org/dp/user/1"
write_dir = '/var/www/sites/usgo.org/theme/includes'
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
