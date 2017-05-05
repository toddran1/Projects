// Text program that uses various cypers //
// to decrypt/encrpt different strings //

#include<iostream>
#include <string>
#include <stdlib.h>
#include <iomanip>
#include <locale>
#include <cstring>
#include <sstream>
#include <list>
#include <sstream>
#include <algorithm>  
#include <bitset>
#include<fstream>

using namespace std;

void encrypt(string& s, string key) {

	int j = 0;

	transform(s.begin(), s.end(), s.begin(), ::toupper);
	transform(key.begin(), key.end(), key.begin(), ::toupper);
	
	for (int i = 0; i < s.length(); i++) {
		if (isalpha(s[i])) {
			s[i] += key[j] - 'A';
			if (s[i] > 'Z') s[i] += -'Z' + 'A' - 1;
		}//fi

		j = j + 1 == key.length() ? 0 : j + 1;
	}//for
}//encrypt

void pad(string& s) {
	
	while (s.length() < 64)
		s.append("A");

}//pad

void pbit(string& str) {

	//ofstream output1;
	//output1.open("output.txt");

	for (unsigned int i = 0; i < str.size(); i++) {
		bitset<8> foo = bitset<8>(str.c_str()[i]);
		if (foo.count() % 2 != 0)
			foo.set(7, 1);

		cout << hex << foo.to_ulong() << " ";
	}//for
	cout << endl;

}//pbit

int main() {

	ofstream output1;
	output1.open("output.txt");

	string s;
	ifstream input("input.txt");     
	char c;
	output1 << "Input from input.txt: " << endl;
		while (input.get(c))  {        
			s += c;
		}//while
	input.close();

	output1  << s << endl << endl;

	char a;
	string str,str1,str2,str3,str4,str5,str6,str7;
	string str8,str9,str10,str11,str12,str13,str14, str15;
	
	//remove spaces
	s.erase(std::remove_if(s.begin(), s.end(), ::isspace), s.end());
	output1 << "Preprocessed string: " << endl << s << endl << endl;

	//key
	string key;
	ifstream kinput("key.txt");     
	char k;
	output1 << "key from key.txt: " << endl;
	while (kinput.get(k))  {       
		key += k;
	}//while
	kinput.close();
	output1 << key << endl << endl;

	
	//encrpts
	encrypt(s, key);
	output1 << "Encrypted string (substitution): " << endl << s << endl << endl;
	
	//pad
	pad(s);
	
	output1 << "Padded string: " << endl << s << endl << endl;
	
	//tokenize string
	str.append(s, 0, 4); str1.append(s, 4, 4); str2.append(s, 8, 4); str3.append(s, 12, 4);
	str4.append(s, 16, 4); str5.append(s, 20, 4); str6.append(s, 24, 4); str7.append(s, 28, 4);
	str8.append(s, 32, 4); str9.append(s, 36, 4); str10.append(s, 40, 4); str11.append(s, 44, 4);
	str12.append(s, 48, 4); str13.append(s, 52, 4); str14.append(s, 56, 4); str15.append(s, 60, 4);

	//circular shift
	rotate(str1.begin(), str1.begin() + 1, str1.end());
	rotate(str2.begin(), str2.begin() + 2, str2.end());
	rotate(str3.begin(), str3.begin() + 3, str3.end());
	rotate(str5.begin(), str5.begin() + 1, str5.end());
	rotate(str6.begin(), str6.begin() + 2, str6.end());
	rotate(str7.begin(), str7.begin() + 3, str7.end());
	rotate(str9.begin(), str9.begin() + 1, str9.end());
	rotate(str10.begin(), str10.begin() + 2, str10.end());
	rotate(str11.begin(), str11.begin() + 3, str11.end());
	rotate(str13.begin(), str13.begin() + 1, str13.end());
	rotate(str14.begin(), str14.begin() + 2, str14.end());
	rotate(str15.begin(), str15.begin() + 3, str15.end());

	output1 << "Circular shift: " << endl;
	output1 << str << endl << str1 << endl << str2 << endl << str3 << endl << str4 << endl;
	output1 << str5 << endl << str6 << endl << str7 << endl << str8 << endl << str9 << endl;
	output1 << str10 << endl << str11 << endl << str12 << endl << str13 << endl << str14 << endl << str15 << endl << endl;
	
	//parity bit
	cout << "Parity bit: " << endl;
	pbit(str); pbit(str1); pbit(str2); pbit(str3); pbit(str4); pbit(str5); pbit(str6); pbit(str7);
	pbit(str8); pbit(str9); pbit(str10); pbit(str11); pbit(str12); pbit(str13); pbit(str14); pbit(str15);

	// close the opened file.
	output1.close();

	return 0;

}//main