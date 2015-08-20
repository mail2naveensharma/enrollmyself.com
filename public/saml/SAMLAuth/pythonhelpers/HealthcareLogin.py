def hclogin(br):
	#Submit the username and password
	br.wk_fill("input[name=password]" , "Alex4023!")
	res = br.submit("input[id=loginSubmit]")
	return res