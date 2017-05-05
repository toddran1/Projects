// Given a sting to determine precedence //
// Prefix or Postfix and can rearrage the string //

#include<iostream>
#include <string>
#include <stdlib.h>
#include <iomanip>
#include <locale>
#include <sstream>
#include<list>
#include <stack>
#include <queue> 
//#include <sstream>
#include <limits>
#include <math.h>
using namespace std;

stack<char> stack1;
string str1;

//function to determine precedence
int precedence(char symbol) {
	int order= 0;
	
	if (symbol == '*' || symbol == '/')// || '%')
		order = 2;
	else  if (symbol == '+' || symbol == '-')
		order = 3;
	else if (symbol == '(')
		order = 4;
	return order;
}//precedence

int topostfix() {
	stack<char> operators; //holds operaters only
	string input;
	int i;

	cout << "Enter some expression: " << endl;
	getline(cin, input);
	//cin >> input;

	string output;

	//for loop for infix to postfix
	for (i = 0; i < input.length(); i++) {
		  //if operator push to operator stack
		if (input[i] == '+' || input[i] == '-' || input[i] == '*' || input[i] == '/' || input[i] == '%') {
			while (!operators.empty() && precedence(operators.top()) <= precedence(input[i])) {
				output.push_back(operators.top());
				operators.pop();
			}//while

			operators.push(input[i]);
		}//if
		 //if higest precedence "parenthesis" checks
		 //and empties operater stack
		else if (input[i] == '(') {
			operators.push(input[i]);
		}//elseif1
		else if (input[i] == ')') {
			while (operators.top() != '(') {
				output.push_back(operators.top());
				operators.pop();
			}//while

			operators.pop();
		}//elseif2
		// push operands to output
		else {
			output.push_back(input[i]);
		}//else
	}//for

	//pop remaining operators
	while (!operators.empty()) {
		output.push_back(operators.top());
		operators.pop();
	}//while

	//push output to global stack
	str1 = output;
	for (i = 0; i < output.length(); i++) {
		stack1.push(output[i]);
	}
	return 0;
}//postfix

int main() {



	stack<double> s;
	stack<char> s1;
	queue<char> q;
	string token, token1;
	double a, b, result;
	int i = 0;
	int c;

	topostfix();

	while (i < str1.length()) {
		token += str1[i];
		token += ' ';
		i++;
	}//for

	cout << "Queue contains: <";
	for (i = 0; i < str1.length(); i++) {
		q.push(stack1.top());
		cout << q.front() << " ";
		s1.push(q.front());
		q.pop();
		stack1.pop();
	}//for1
	cout << ">" << endl;

	token += '=';

	//evaluation of expression
	while(token[i] != '=') {
		// change stack char elements to floats
		token1 += s1.top();
		result = atof(token1.c_str());
		if (result != 0.0)
			s.push(result);
		else
			switch (s1.top()) {
			case '+': b = s.top(); s.pop(); a = s.top();
				s.pop(); s.push(a + b); break;
			case '-': b = s.top(); s.pop(); a = s.top();
				s.pop(); s.push(a - b); break;
			case '*': b = s.top(); s.pop(); a = s.top();
				s.pop(); s.push(a*b); break;
			case '/': b = s.top(); s.pop(); a = s.top();
				s.pop(); s.push(a / b); break;
			case '%': b = s.top(); s.pop(); a = s.top();
				s.pop(); s.push(fmod(a, b)); break;
		}//switch
		token1.erase();
		s1.pop();
		i++; 
	}//while
	
	cout << "The result is: " << s.top() << endl;

	cin.ignore(numeric_limits<streamsize>::max(), '\n');
	//cin >> token;
	return 0;
}//main
