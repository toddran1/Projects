#include<iostream>
#include <string>
#include <stdlib.h>
#include <iomanip>
#include <math.h>
#include <locale>
#include<list>
//#include <stack>
//#include <queue> 
#include <sstream>
//#include <limits>
#include <time.h>

using namespace std;

int a[10001];

void times10(int);
void merge(int, int, int);
void Msort(int, int);

void times10(int n) {
	
	int i, j, k = 0;
	double diff, avg = 0;
	timespec time1, time2, avg3;
	
	for(i = 0; i < 10; i++) {
		
		clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time1);
		Msort(1, n);
		clock_gettime(CLOCK_PROCESS_CPUTIME_ID, &time2);

		avg += (time2.tv_nsec - time1.tv_nsec);

		//print sorted array
		//for (i = 1; i <= num; i++)
		//	cout << a[i] << "  ";

		cout << "N = " << n << " Running Time: " << (time2.tv_nsec - time1.tv_nsec) << " nanoseconds" << endl;
	}//for

	cout << "Avg: " << setprecision(8) << avg/10 << endl;
	avg = 0;

}//times10

void merge(int low, int mid, int high) {

	int h, i, j, b[10001], k;
	h = low;
	i = low;
	j = mid + 1;

	while ((h <= mid) && (j <= high)) {
		if (a[h] <= a[j]) {
			b[i] = a[h];
			h++;
		} else {
			b[i] = a[j];
			j++;
		}//ifelse
		i++;
	}//while

	if (h>mid) {
		for (k = j; k <= high; k++) {
			b[i] = a[k];
			i++;
		}//for
	} else {
		for (k = h; k <= mid; k++) {
			b[i] = a[k];
			i++;
		}//for2
	}//ifelse2

	for (k = low; k <= high; k++) 
		a[k] = b[k];

}//merge


void Msort(int low, int high) {

	int mid;
	if (low<high) {
		mid = (low + high) / 2;
		Msort(low, mid);
		Msort(mid + 1, high);
		merge(low, mid, high);
	}//if

}//Msort


int main() {

	int num = 10, i,j;
	string q = "quit";

	cout << "*****Merge Sort*****" << endl << endl;

	while (q == "quit") {
		for (j = 0; j < 4; j++) {
			for (i = 1; i <= num; i++) {
				a[i] = rand() % num + 1;
			}//for2

				times10(num);
				
				cout << endl;
				
				num = num * 10;
		}//for1
		
		cout << endl << "Enter 'quit' to exit." << endl;
		cin >> q;
		q = "abc";
		cout << endl << endl;	
	}//while
	
	return 1;

}//naim