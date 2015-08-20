import spynner
import urllib2
from pythonhelpers.HealthcareAuth import hcauth, hcgetcookie
from pythonhelpers.HealthcareLogin import hclogin
from pythonhelpers.HealthcareFormFilling import hcnewappselect

br = spynner.Browser()
url = "https://www.healthcare.gov/marketplace/global/en_US/registration"
br = spynner.Browser()
br.create_webview()
br.addheaders = [("User-agent", "Mozilla/5.0")]
br.load(url)

# Run authentication with healtcare.gov site
res = hcgetcookie(br)
print "Got Health Care cookie."
res = hcauth(br)
print "Authenticated SAML"

#Log in to the Healthcare.gov site
#res = hclogin(br)

#Select a year and state from the healthcare.gov landing page
#res = hcnewappselect(br)

#Fill in the registration form on the healthcare.gov site
#res = hcfillinform(br)


br.close()