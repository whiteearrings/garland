f = open("db2.json","r")
i = 1
def create( f ):
	l = True
	global i
	while(l):
		l = f.readline()
		n = l[0:1] + ' "gid" : "gid"' + str(i) + ' ,' + l[1:]
		print(n);

create( f )
	
