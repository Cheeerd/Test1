#!/bin/bash
sqlite3 test1.db < installer/installer.sql
chmod a+w test1.db
