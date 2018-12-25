function palindromeChecker (string) {

	//Assume string = "Race Car" for example
	
	var lowerCaseString = string.toLowerCase();
	
	// Now, string = "Race Car" => string = "race car" 
	
	var nonANString = lowerCaseString.replace(/[\W\s+]/ , '')
	
	// This removes any non-alphanumerical characters and white space
	// Therefore, string = "race car" => string = "racecar"
	
	for (var i = 0 , j = nonANString.length-1; 
	i <= nonANString.length , j >= 0 ;
	i++ , j--) {
		 
	       if (nonANString[i] != nonANString[j]) {
				return false;
	// Checks if character at position i equals character at position j 
	// where j = nonANString.length - i			
	// if NOT equal, at any iteration, return false
		}
	}
	
	return true;
	
	// This is the default return value of true
	// i.e program assumes input is palindrome
	// unless the validation above in the for loop informs us otherwise
	}
	
	
	
}