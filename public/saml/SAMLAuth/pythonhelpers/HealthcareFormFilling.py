from datetime import date
from StatesDict import getstates

def hcnewappselect(br):
	#Select this year's date
	br.wk_select('select[id=yearDropdownview51]',  str(date.today().year))
	#Select the user's state
	states = getstates()
	#Submit form
	
def startnew(br):
	#Click the Start New Application button
	br.wk_click(".startNewPaperApplicationsLink")
	br.wait_load()
	br.browse()
	return

def hcfillinform(br):
	#Agree to the privacy policy
	br.check("#privacyPolicyAgree")
	
	#Fill in Contact Information form
	fillContactForm()
		
def fillContactForm():
	#Fill in Contact Information form
	br.wk_fill("#contactFirstName" , "Alex")
	br.wk_fill("#contactMiddleName" , "Alex")
	br.wk_fill("#contactLastName" , "Alex")
	br.wk_select("#contactSuffix" , "Jr.")
	br.wk_fill("#contactDateOfBirth" , "06091988")
	br.wk_fill("#contactEmailAddress" , "Alex")
	
	#If no home address, check box.
	if(true):
		br.check("#noFixedAddress")
	#Otherwise, fill in home address.
	else:
		br.wk_fill("#contactAddressStreetName1" , "Alex")
		br.wk_fill("#contactAddressStreetName2" , "Alex")
		br.wk_fill("#contactAddressCity" , "Alex")
		states = getstates()
		br.wk_select("#contactAddressState" , "Jr.")
		br.wk_fill("#contactAddressZip" , "Alex")
		#Select different mailing address
		if(true):
			br.radio("contactMailingAddressSameYes")
		else:
			br.radio("contactMailingAddressSameNo")
	
	#If no home address, or different mailing address, fill in mailing address
	if(true or true):
		br.wk_fill("#contactMailingAddressStreetName1" , "Alex")
		br.wk_fill("#contactMailingAddressStreetName2" , "Alex")
		br.wk_fill("#contactMailingAddressCity" , "Alex")
		states = getstates()
		br.wk_select("#contactMailingAddressState" , "Jr.")
		br.wk_fill("#contactMailingAddressZip" , "Alex")
	
	#Fill in phone numbers
	br.wk_fill("#contactPhone" , "Alex")
	br.wk_fill("#contactPhoneExt" , "Alex")
	br.wk_select("#contactPhoneTypePrimary" , "Home")
	br.wk_fill("#contactSecondaryPhone" , "Alex")
	br.wk_fill("#contactSecondaryPhoneExt" , "Alex")
	br.wk_select("#contactPhoneTypeSecondary" , "Home")
	
	#Fill In Contact Preferences
	br.wk_select("#contactSpokenLanguage" , "English")
	br.wk_select("#contactWrittenLanguage" , "English")
	if(true):
		br.radio("#noticesOnlineYesRadio")
	else:
		br.radio("#noticesOnlineNoRadio")
		
