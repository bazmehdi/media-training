# How to use Git for local version control: Beginners Guide (2026) 
- when using AI Agents (VS Code)

*Trainer: Dele Oke*  
---


![Git Logo](https://www.creativewords.co.uk/students/delegate/Git-Logo-1788C.svg)

- First version of Git was created by Linus Torvalds in 2005.

- Git had a major update with [git 2.23 (August 2019)](https://github.blog/open-source/git/highlights-from-git-2-23/) 

- And again with [git 2.52 (November 2025)](https://github.blog/open-source/git/highlights-from-git-2-52/). 

This tutorial will follow these *modern git commands*. 


This short tutorial shows how to:
- Turn a local folder into a **Git repository**
- Master the **3 Git states** to save work effectively
- Use **branches** to isolate features and experiment safely


Here I am using **VS Code integrated terminal** but you can use any tool of choice.

## Installation of Git
-  [Download Git here - https://git-scm.com/](https://git-scm.com/)

**Check version of Git you have installed**


```bash
git --version # at least version 2.52
```

**Simple Configuration**

```bash
# set the default branch to main
git config --global init.defaultBranch main

# rename a branch to main
git branch -m main # -m stands for mmove

# set username and email
git config --global user.name "{your_name}"
git config --global user.email "{your_email}"


# check username and email
git config --global user.name 
git config --global user.email 
```


## 📌 Understand the 3 Git States

When you work with files in Git, they can be in one of three states:

1. **Modified**  
This means you have changed a file in your project folder (your working area), but Git has not saved it yet. It’s like scribbling on a page, the changes exist, but they are not yet recorded. 


2. **Stage**  
This is where you tell Git “I want to include this change in the next save.” You do this with `git add.` Staging is like selecting pages you want to include before you print. 


3. **Commit**  
Once staged, changes are safely recorded in Git’s history. You can now commit them with
`git commit -m "Message"`Think of this as taking a snapshot of your work, a permanent save that you can go back to later. 

---


## 1. Starting Point: Your Project Folder in VS Code

1. Open VS Code  
2. Open a folder (e.g. `my-project`)  
3. Open the terminal: **View → Terminal**

Your terminal should already be inside that folder.

---

## Part A: Working Locally with Git (No Internet Needed)

### 1. `git init` — Initialise Git in the Folder

Turns the current folder into a Git repository.

```bash
git init
```

**What happens**

A hidden .git folder is created

Git can now track changes in this folder

### 2. `git status` Check what's changed
Show the current state of your project

```bash
git status
```
**Example of a response**

Untracked files:
  index.html
  app.js

**NOTES**

- Your main branch should be called `main`. 
- You can check it with ``git branch`` or ``git status``
- If it is not called main you can change the branch name with

```bash
git branch -m main # -m stands for move. This renames your branch to main

```
**Next Step**
Add some new files to your project.  
Then run 

`git status`

Note the untracked files

### 3. `git add` Stage changes
Adds files to the staging area (ready for a checkpoint).

```bash
git add readme.md # add a particular page
git add . # add all pages
```

### 4. `git commit` Create a checkpoint
A saved point. You can now push this to Github or another branch.  
Saves a snapshot of staged changes.  

```bash
git commit -m "Your comments here" # m stands for message
```

**Excercise**
- Create a HTML form
- `add` and `commit` it
- Now for a simple version control
- Close your folder down completely
- Now assume you come back the next day
- `restore only works for simple changes to one page`
- Make some changes to your form (`add a fieldset and legend`)
- Save
- Now let's assume you don't like the changes
- run the following

```bash
# This is only good for simple one page revision
git restore workarea/form.html # restores file from your last commit
```

### 5. `git branch` view existing branches and create a branch
Start further work on project without affecting the current work

```bash
git branch # lists all existing branches
git branch features-new # creates another branch called 'feature-formaccept'
```

### 6. `git switch features-new` switch to new branch
Switch to new branch and continue to work - checkpoint

```bash
git switch features-new # switch to branch feature-form
git switch -c features-new # This createsthe deature-new branch and switches to it
```
You can now add new features and edits to your project  
On this new branch without any changes appearing in the main branch
Remember to add and commit when you finish

### 7 `git merge` merging branch back to main
After you make changes on this new branch remember to add and commit

```bash
git add .
git commit -m "State short summary of changes"
```

Then switch back to the main branch

```bash
git switch main
git branch # This will show branch you are now on
```
You can now merge the branches.  
make sure you are on main when running this command

```bash
git merge features-new
```

### 8. `git branch -d` Delete unwanted branch
Don't leave old branch hanging about. Delete

```bash
git branch -d features-new # deletes a local branch only if it has been fully merged (safe delete).
git branch -D features-new # force-deletes a local branch even if it hasn’t been merged (unsafe).
```

**What this means**

* The branch name is removed
* The merged code stays in main
* Your project now continues with the original branch structure

Check remaining branches:

```bash 
git branch
```

**Check your commits**

```bash
$ git log --oneline
```

**Check a specific files logs**

```bash
git log filename
```

**Check the last log only**

```bash
git log -1 filename
```

### References

- [Git Cheat Sheet](https://git-scm.com/cheat-sheet)

- *Set the default branch* to be created to main 

```bash
git config --global init.defaultBranch main
```

- *Rename a branch*

```bash
git branch -m renamed_branch_name # -m stands for mmove
``` 

- Stop a folder from being a repository

```bash
rm -rf .git
```