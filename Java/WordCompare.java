//'main' method must be in a class 'Rextester'.
//Compiler version 1.8.0_72

import java.util.*;
import java.lang.*;
import java.io.*; 


class Rextester
{ 
    
     public static boolean Rextester(String word1){
         
         String word2 = new String();
         int i = word1.length();
        
         for(i=i-1; i>=0; i--)
             word2 += word1.charAt(i);
             
         
         if(word1.equals(word2)) {
             System.out.println("True");
             return true;
         } else {
             System.out.println("False: " + word1 + " is not the same as " + word2);
             return false;
         }//if
   
    }//constructor
    
    
  
    public static void main(String args[]) throws IOException 
    {
     
      //  InputStreamReader r=new InputStreamReader(System.in);  
      //  BufferedReader br=new BufferedReader(r); 
        BufferedReader readConsole = new BufferedReader(new InputStreamReader(System.in));
        
             System.out.println("type a word\n");
                 String name = readConsole.readLine();
                // String name = br.readLine(); 
       
        
          //String name ="racecar";  
          Rextester(name);
    }//main
}


// available at: http://rextester.com/CSIH27710