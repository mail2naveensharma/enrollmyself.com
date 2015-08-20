def hcgetcookie(br):
	url = "https://imp1a.healthcare.gov/?ACA=27zNgIcNigKh"
	return br.load(url)

def hcauth(br):
	url = "http://localhost/samlauth/samlauth2.php"
	br.load(url)
	return br.submit("input[name=submit]")