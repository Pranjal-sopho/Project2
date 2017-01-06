/**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */


#include <stdbool.h>
#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>


#include "dictionary.h"

#define SIZE 1000000
/**
 * Returns true if word is in dictionary else false.
 */
 typedef struct node{
     char word[LENGTH+1];
     struct node* next;
 }node;
 

node* hashtable[SIZE] = {NULL};

int sizeofdictionary = 0;

//hash function source internet
int hash (const char* word)
{
    int hash = 0;
    int n;
    for (int i = 0; word[i] != '\0'; i++)
    {
        // alphabet case
        if(isalpha(word[i]))
            n = word [i] - 'a' + 1;
        
        // comma case
        else
            n = 27;
            
        hash = ((hash << 3) + n) % SIZE;
    }
    return hash;    
}
bool check(const char* word)
{
    char temp[LENGTH + 1];
    int len = strlen(word);
    for(int i = 0; i < len; i++)
        temp[i] = tolower(word[i]);
    temp[len] = '\0';
    
    int n = hash(temp);
    if (hashtable[n] == NULL)
    return false;
    node* nnode = hashtable[n];
    while(nnode != NULL){
        if(strcmp(temp, nnode->word)==0)
        return true;
        else nnode = nnode->next;
    }
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    FILE* dict = fopen(dictionary, "r");
    if(dict == NULL){
    printf("unable to open the dictionary!");
    return false;
    }
    char word[LENGTH+1];
    while(fscanf(dict, "%s\n",  word)!=EOF){
        sizeofdictionary++;
        node* newnode = malloc(sizeof(node));
        
        strcpy(newnode->word, word);
        
        int index = hash(word);
        
        if(hashtable[index] == NULL){
            hashtable[index] = newnode;
            newnode->next = NULL;
        }
        else {
            newnode->next = hashtable[index];
            hashtable[index] = newnode;
            
        }
    }
    fclose(dict);
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return sizeofdictionary;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    int index = 0;
    while(index<SIZE){
        
        while(hashtable[index]!= NULL){
            node* temp = hashtable[index];
            hashtable[index] = temp->next;
            free(temp);
        }
        index++;
    }
    return true;;
}
