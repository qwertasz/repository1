# Consileon Zadania


#Logic-1
#You have a green lottery ticket, with ints a, b, and c on it. If the numbers are all different from each other, the result is 0. #If all of the numbers are the same, the result is 20. If two of the numbers are the same, the result is 10.

public int greenTicket(int a, int b, int c) {
  if(a == b)
	{
		if(b == c)
			return 20;
		return 10;
	}
	if(a == c || b == c)
		return 10;
return 0;
}


#AP-1
#Given an array of strings, return a new array containing the first N strings. N will be in the range 1..length.

public String[] wordsFront(String[] words, int n) {
  
  String[] g = new String[n];
    
    for(int i = 0; i < g.length; i++)
        g[i] = words[i];
              
    return g;
}

#AP-1
#Given an array of strings, return the count of the number of strings with the given length.

public int wordsCount(String[] words, int len) {
  
  int x = 0;
    for(int i = 0; i < words.length; i++) {
        if(words[i].length() == len)
            x++;
    }
  return x;
}
