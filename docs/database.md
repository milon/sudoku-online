# Database Schema

## users

- id
- name
- email
- password
- api_token
- reset_key
- remember_token
- is_admin
- created_at
- updated_at

## password_resets

- email
- token
- created_at

## profiles

- id
- user_id
- points
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
