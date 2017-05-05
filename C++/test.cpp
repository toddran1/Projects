#include<iostream>
#include <string>
#include <stdlib.h>
#include <iomanip>
// Test to use Time.h //

#include <math.h>
#include <locale>
#include<list>
//#include <stack>
//#include <queue> 
#include <sstream>
//#include <limits>
#include <time.h>

using namespace std;

int main() {

	int sum, i;
	double avg = 0;
	timespec time1, time2;

	for(i = 0; i < 10; i++) {
		clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time1);
		sum = 1;
		clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time2);

		avg += (time2.tv_nsec - time1.tv_nsec);

		cout << "1 operation took " << (time2.tv_nsec - time1.tv_nsec) << " nanoseconds." << endl;
	}//for
		cout << "Average = " << avg/10 << endl;

	return 0;
}//main
