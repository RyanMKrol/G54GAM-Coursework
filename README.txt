Welcome to my game.

The idea behind my game is a "superhot" style approach to puzzle games. Each character
has only a limited amount of time to accomplish a goal, and you have to be careful in
choosing which character does what. The timer for each character depletes as you control
it, so be careful not to let time pass by doing nothing!

Instructions:
  A and D, to move left and right
  Space to jump
  Tab to shift characters

Attributions:
  All assets were gotten from the following site:
    https://kenney.nl/assets
  All assets are public domain (CC0) licensed:
    https://kenney.nl/support

Known bugs:

  * Some clipping issues with the collision detection in Unreal, unfortunately not something I can do a lot about.

  * The level 7 tile map seems to "forget" it's collision boundaries a lot so I've just put some blocking volumes to
  ensure that the characters always appear to be "on" the tiles - didn't have to do this with any other level.

  * Unreal also has a habit of "forgetting" the default variables I set, I'm not sure why, hopefully they don't get lost
  in translation. I definitely set all of the variables in the editor though, if you have any issue please contact me.

  * I've also included a binary for Macs in ./MacBinary/ - your tutorials used a Mac so I assumed this would be the preferred
  format

Notes on commenting:
  * I have a lot of levels in my game, and they all use the same blueprint. Ideally I would have found a way to use a base
  "level" blueprint and just have them all inherit from it, but I don't think Unreal supports that the way I needed it to.
  Because of this, I've commented only Level_1's level blueprint, the others will be identical.
