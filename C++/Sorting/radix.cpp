#include<iostream>
#include <string>
#include <stdlib.h>
#include <iomanip>
#include <math.h>
#include <locale>
#include<list>
//#include <stack>
//#include <queue>
//#include <limits>
#include <sstream>
#include <time.h>
#include<cstdio>

using namespace std;

void radix(int*, int, int);

void radix(int* nums, int length, int max) {

	list<int> bucket[10];
	int i, k, n;

	// iterate through each radix until n>max
	for (n = 1; max >= n; n *= 10) {
		// sort list of numbers into buckets
		for (i = 0; i < length; i++)
			bucket[(nums[i] / n) % 10].push_back(nums[i]);

		// merge buckets back to list
		for (k = i = 0; i<10; bucket[i++].clear())
		for (list<int>::iterator j = bucket[i].begin(); j != bucket[i].end(); nums[k++] = *(j++));
	}//for
}//radix

int main() {

	int nums[10001];
	int number = 10, i, j, k, max = 0;
	double avg = 0,avg2 = 0, diff;
	timespec time1, time2, avg3;
	string rad = "quit";
	srand(time(NULL));

	cout << "*****Radix Sort*****" << endl << endl;

	while (rad == "quit") {
		for (j = 0; j < 4; j++) {
			for (k = 0; k < 10; k++) {
				for (i = 0; i < number; i++) {
					nums[i] = rand() % number + 1;

					//find max element
					max = (nums[i] > max) ? nums[i] : max;
					//print unsorted array
					//cout << nums[i] << endl;
				}//for3

				clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time1);
				radix(nums, number, max);
				clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time2);
				
				avg += (time2.tv_nsec - time1.tv_nsec);
				
				//cout << "seconds: " << diff1(time1, time2).tv_sec << "\tnanoseconds: " << diff1(time1, time2).tv_nsec << endl;
				//print sorted array
				//for (int k = 0; i < number; i++)
					//cout << "\t" << nums[i] << "\r\n";
				cout << "N = " << number << " Running Time: " << (time2.tv_nsec - time1.tv_nsec) << " nanoseconds" << endl;
			}//for2
			
			cout << "Average is: " << avg/10 << endl;
		
			number = number * 10;
			avg = 0;
			cout << endl;
		}//for

		cout << "Enter anything to quit" << endl;
		cin >> rad;
		cout << endl;
	}//while
	
	return 0;
}//main



