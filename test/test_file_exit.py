# -*- coding: utf-8 -*-

import urllib2

from pprint import pprint

SITE_URL = 'http://ce50h7/dev/nyusatsu_check_view/'

def clean_string(string):
	string_f = string

	# キャリッジ リターン
	char_CR = "\r\n"
	# ライン フィード
	char_LF = "\n"
	# タブ
	char_TAB = "\t"

	# スペース
	char_SPACE = ' '

	string_f = string_f.replace(char_CR, char_SPACE)
	string_f = string_f.replace(char_LF, char_SPACE)
	string_f = string_f.replace(char_TAB, char_SPACE)

	# strpos => 文字列の中で、引数の文字が最初に現れた位置を数字で返します
	while 0 <= string_f.find('  '):
		string_f = string_f.replace('  ',' ')

	return	string_f

if __name__ == '__main__':
	
	f = open('file_list.txt')
	lines2 = f.readlines() # 1行毎にファイル終端まで全て読む(改行文字も含まれる)
	f.close()
	
	# lines2: リスト。要素は1行の文字列データ
	 
	path_list = []
	count = 0
	# pprint(lines2)
	for line in lines2:
		if 0 < line.find('ajax'):
			continue
		count = count + 1
		print count,
			
		list = line.split('/')
		
		list.pop(0)
		list.pop(0)
		list.pop(0)
		list.pop(0)
		list.pop(0)
		list.pop(0)

		path = SITE_URL + '/'.join(list)
		print path,
		path_list.append(path)

	print '## check href'
	
	for url in path_list:
		url = url.replace('\n', '')
		print '###' + url
		site_dir = url.split('/')
		site_dir.pop()
		site_dir = '/'.join(site_dir) + '/'

		fp = urllib2.urlopen(url)
		html = fp.read()
		fp.close()
		
		html = clean_string(html);
		
		# pprint(list)
		list = []
		
		start = 1
		while True:
			start_sub = '<a href="'
			start_index = html.find(start_sub, start)
			
			if 0 < start_index:
				end_sub = '"'
				end_index = html.find(end_sub, start_index + len(start_sub))

				if 0 < end_index:

					html_a = html[start_index + len(start_sub):end_index]
					if 0 > html_a.find('http'):					
						
						html_a = site_dir + html_a
						

					# if not site_dir == html_a :
						# a = 0
					# elif 0 < html_a.find('#'):
						# a = 0
					# else:

					# print html_a.find('#')
					if site_dir == html_a :
						a = 0
					elif 0 < html_a.find('#'):
						a = 0
					else:
						# print html_a
						list.append(html_a)

					start = start_index + 1
				else:
					break
			else:
				break
				
		# print('## exit href')
		for href in list:

			try:
				# pprint(href)
				# urllib2.urlopen('http://ce50h7/nyusatsu_check_view/etc/../search/search.php?q=130611-H2410311436-21')
				urllib2.urlopen(href)
				# print '--- : ' + href
			except:
				print '404 : ' + href

			# r = urllib2.urlopen('http://ce50h7/nyusatsu_check_view/indexaa.php')
			# print r.code
	
	
		