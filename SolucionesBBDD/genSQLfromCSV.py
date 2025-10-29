#! /usr/bin/env python3
# vim:fenc=utf-8
#
# Copyright © 2024 jgr <jgr@karraka.local>
#
# Distributed under terms of the MIT license.

"""

"""

import csv
import sys

filename = sys.argv[1]
exerciseID = int(sys.argv[2])
tableID = int(sys.argv[3])

with open(filename, newline='',encoding='utf-8') as csvfile:
    r = csv.reader(csvfile, delimiter=';')
    header = 1
    for index, row in enumerate(r):
        if index > 0:
            for device in range(5):
                if row[device*12+2] != "NULL":
                    print(f'\tINSERT INTO `ExercisesDNS` VALUES ({tableID}, {exerciseID}, {row[device*12]}, {row[device*12+1]}, {row[device*12+2]}, {row[device*12+3]}, {row[device*12+4]}, {row[device*12+5]}, {row[device*12+6]}, {row[device*12+7]}, {row[device*12+8]}, {row[device*12+9]}, {row[device*12+10]}, {row[device*12+11]});')
                    tableID = tableID+1;

