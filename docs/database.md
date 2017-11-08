# Database Schema

## users

- id
- name
- email
- password
- remember_token
- created_at
- updated_at

## password_resets

- email
- token
- created_at

## players

- id
- name
- email
- password
- points
- api_token
- reset_key
- meta
- created_at
- updated_at

## games

- id
- name
- grid_size
- difficulty
- problem
- solution
- score
- penalty
- meta
- created_at
- updated_at

## levels

- id
- name
- points_from
- points_to
- created_at
- updated_at

## game_level

- id
- game_id
- level_id
- position
- created_at
- updated_at
