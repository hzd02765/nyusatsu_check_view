# -*- coding: utf-8 -*-

from pprint import pprint
import http.client

SITE_URL = 'http://ce50h7/nyusatsu_check_view/'

if __name__ == '__main__':

	f = open('file_list.txt')
	lines2 = f.readlines() # 1行毎にファイル終端まで全て読む(改行文字も含まれる)
	f.close()
	
	# lines2: リスト。要素は1行の文字列データ
	 
	for line in lines2:
		list = line.split('/')
		
		list.pop(0)
		list.pop(0)
		list.pop(0)
		list.pop(0)
		list.pop(0)
		
		pprint(list)
		
		path = SITE_URL + '/'.join(list)
		# pprint(path)
		print path,
		
		# print line,
	print
	
	