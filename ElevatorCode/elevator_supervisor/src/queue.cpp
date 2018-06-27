/*
  PROGRAM:	queue.cpp
	AUTHOR		Michael Wright
	DATE:		  June 26, 2018
	PURPOSE:	Defines the functions for implementing queue.
*/

//  Libraries:
#include <stdio.h>
#include <stdlib.h>
#include "node.h"
#include "queue.h"

static Node *pHead, *pTail;

void initialQueue(void)
{
	pHead = pTail = NULL;
}

//	Returns non-zero if queue is empty.
int isQueueEmpty(void)
{
	return (pHead == NULL);
}

//	Adds a node to the end of queue or creates one if none are present.
void addToQueue(Node *pn)
{
	if (pHead == NULL)
	{
		pHead = pn;	//	Makes the first item the head.
	} else {
		pTail->pNext = pn; //	Makes the last input point to the newest item.
	}
	pn->pNext = NULL;
	pTail = pn; //	Makes the last input the tail.
}

node *deQueue(void)
{
	Node *pTemp;
	if (pHead == NULL) return(NULL);
	pTemp = pHead;
	pHead = pHead->pNext; // Make next item the new head.
	return(pTemp);	  // Returns the old head.
}


//	Assignment 2
void traverse(link h, void(*visit)(link))
{
	if (h == NULL) return;
	(*visit)(h);  // Calls visit before the recursive call.
	traverse(h->pNext, visit);
}

void traverseR(link h, void(*visit)(link))
{
	if (h == NULL) return;
	traverseR(h->pNext, visit);
	(*visit)(h);
}

void visit(Node *h){
	printf("%s \n", h->msg.buff);
}

Node *getHead(void){
	return pHead;
}
