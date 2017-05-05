// Takes an array of numbers and sorts it //

#include <stdio.h>


void swap(int n) {

   int num[5];
   int next, i, j;

   printf("\nPlease enter 5 numbers:\n");
    
   for (i = 0; i < n; ++i)
      scanf("%d", &num[i]);
    
   for (i = 0; i < n; ++i) {
      for (j = i + 1; j < n; ++j) {
         if (num[i] < num[j]) {
            next = num[i];
            num[i] = num[j];
            num[j] = next;

         }//if

      }//for2

   }//for1

   printf("\nSorted array (descending):\n");
    
   for (i = 0; i < n; ++i) 
      printf("%d  ", num[i]);
	printf("\n\n");

}//swap
 

int main () {

   int n = 5;
   swap(n);
   return 0;

}//main