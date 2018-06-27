/*
  FILE:     queue.h
  AUTHOR:   Michael Wright
  DATE:     June 26, 2018
  PURPOSE:  Define queue functions.
*/


//  Libraries:
#include "node.h"

//	Prototypes:
void initialQueue(void);
int isQueueEmpty(void);
void addToQueue(node *);
node *deQueue(void);
void traverseR(link h, void(*visit)(link));
void visit(node *h);
node *getHead(void);
void traverse(link h, void(*visit)(link));
