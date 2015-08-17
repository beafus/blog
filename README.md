# Blog
This blogging platform offers two different pages. One administrative page to save new blog entries and another separate page for outside users to view the last five blog entries.

## Administrators

* **Administrators are able to use the admin section to upload a blog entry that consists of a title and blog text.**
 * This has been done through a single form that allows all these fields.Then the blog file is saved into a new folder for each new entry.
 * To upload a blog, they must type a title and a text. If any of them is missing an error message will appear saying: “You must enter a title and a post”.
 * Blogs entries are saved in files for safe keeping. Each one is stored in a different folder named “blogX”, being X  the blog number.
* **Administrators are also be able to add an optional image to blog entries**
 * The image will be saved  to the same folder as the blog entries

## Regular Users
* The blogging platform allows regular internet users to view up to the last five blog entries on the main page of the website. Each blog entry clearly shows the title, the blog text, and the image(if uploaded) that the administrator uploaded for that entry.
* Clicking on each blog entry’s title from the user page will display a new page containing only that blog entry.
* Users of the main blog site will see the images uploaded with each blog entry only if one exists.

##Sessions 
* **The blogging platform shows in a common footer at the bottom of every page the number of times the user has visited any page**
 * There should also be a button to reset the count to zero
 * This has been achieved with session variables

