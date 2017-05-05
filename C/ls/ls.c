// Sorts and finds the biggest and //
// smallest numbers in an array //

#include <stdio.h>

int main () {

   int num[1000], n;
   int next, i, j;

   printf("\nPlease enter the size of N:\n");
   scanf("%d", &n);

   printf("\nPlease the numbers:\n");
   for (i = 0; i < n; i++)
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

   printf("\nSmallest number: %d", num[n-1]);	
   printf("\nLargest number: %d\n\n", num[0]);
    
   return 0;
}//main