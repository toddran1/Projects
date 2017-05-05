// Finds the sum of 2 matrices //
#include <stdio.h>
 
int main() {

   int i,sum[4],m1[4],m2[4];
   
   printf("\nEnter the elements of first matrix:\n");
 
   for (i = 0; i < 4; i++)
         scanf("%d", &m1[i]);
 
   printf("\nEnter the elements of second matrix:\n");
 
   for (i = 0 ; i < 4; i++)
         scanf("%d", &m2[i]);
 
   printf("\nSum of entered matrices:\n");
 
   for (i = 0; i < 4; i++) 
      sum[i] = m1[i] + m2[i];

         printf("%d\t%d\n%d\t%d\n\n", sum[0], sum[1], sum[2], sum[3]);

   return 0;
}//main