/*
  FILE:     node.h
  AUTHOR:   Michael Wright
  DATE:     June 26, 2018
  PURPOSE:  Defines queue node structure for queuing elevator
            events.
*/

//  Only include once.
#pragma once

struct message  {
  int senderId;
  int recieverId;
  unsigned char message;
};

typedef struct message Message;
typedef struct node *link;

struct node {
  link pNext;
  Message msg;
};

